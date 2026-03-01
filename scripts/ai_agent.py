import os
import subprocess
import requests
from openai import OpenAI

# إعدادات Groq و GitHub
GROQ_KEY = os.getenv("GROQ_API_KEY")
GITHUB_TOKEN = os.getenv("GITHUB_TOKEN")
REPO = os.getenv("REPO_NAME")
SHA = os.getenv("COMMIT_SHA")

client = OpenAI(
    base_url="https://api.groq.com/openai/v1",
    api_key=GROQ_KEY
)

def get_git_diff():
    try:
        # جلب التغييرات بين آخر 2 commit
        diff = subprocess.check_output(['git', 'diff', 'HEAD~1', 'HEAD']).decode('utf-8')
        return diff
    except Exception as e:
        print(f"Error getting diff: {e}")
        return None

def main():
    diff = get_git_diff()
    if not diff or len(diff.strip()) < 10:
        print("No significant changes found.")
        return

    print("Analyzing with Groq AI (Llama 3)...")
    try:
        completion = client.chat.completions.create(
            model="llama-3.3-70b-versatile",
            messages=[
                {"role": "system", "content": "You are a Senior Laravel Expert. Review the code diff and provide a code review and PHPUnit tests."},
                {"role": "user", "content": f"Review this Laravel code change:\n\n{diff}"}
            ]
        )
        
        result = completion.choices[0].message.content
        
        # حفظ النتيجة في ملف
        with open("ai_review.md", "w", encoding="utf-8") as f:
            f.write("# 🤖 AI Code Review (Laravel)\n\n")
            f.write(result)
        print("Review successfully saved to ai_review.md")

        # إرسال الكومنت لـ GitHub عشان تشوفه من الموبايل أو المتصفح فوراً
        url = f"https://api.github.com/repos/{REPO}/commits/{SHA}/comments"
        headers = {"Authorization": f"token {GITHUB_TOKEN}", "Accept": "application/vnd.github.v3+json"}
        requests.post(url, json={"body": result}, headers=headers)

    except Exception as e:
        print(f"Error during AI processing: {e}")

if __name__ == "__main__":
    main()
