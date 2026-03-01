import os
import subprocess
import requests
from openai import OpenAI

# إعدادات Groq
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
        diff = subprocess.check_output(['git', 'diff', 'HEAD~1', 'HEAD']).decode('utf-8')
        return diff
    except:
        return None

def main():
    diff = get_git_diff()
    if not diff:
        print("No changes found.")
        return

    print("Analyzing with Groq AI...")
    try:
        completion = client.chat.completions.create(
            model="llama-3.3-70b-versatile",
            messages=[
                {"role": "system", "content": "You are a Laravel Expert. Review code and provide tests."},
                {"role": "user", "content": f"Review this Laravel diff and generate PHPUnit tests:\n\n{diff}"}
            ]
        )
        
        result = completion.choices[0].message.content
                with open("ai_review.md", "w", encoding="utf-8") as f:
            f.write("# AI Code Review Result\n\n")
            f.write(result)
        print("Review saved to ai_review.md")
        url = f"https://api.github.com/repos/{REPO}/commits/{SHA}/comments"
        requests.post(url, json={"body": result}, headers={"Authorization": f"token {GITHUB_TOKEN}"})

    except Exception as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    main()
