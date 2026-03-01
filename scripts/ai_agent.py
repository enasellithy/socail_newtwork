import os
import subprocess
import requests
from openai import OpenAI

# الإعدادات
GROQ_KEY = os.getenv("GROQ_API_KEY")
SLACK_WEBHOOK = os.getenv("SLACK_WEBHOOK_URL")
REPO = os.getenv("REPO_NAME")
SHA = os.getenv("COMMIT_SHA")

client = OpenAI(base_url="https://api.groq.com/openai/v1", api_key=GROQ_KEY)

def send_to_slack(text):
    if not SLACK_WEBHOOK:
        return
    # بنبعت أول 3000 حرف عشان Slack ليه ليميت في الرسالة الواحدة
    payload = {"text": f"🚀 *AI Code Review for {REPO}*\n\n{text[:3000]}"}
    requests.post(SLACK_WEBHOOK, json=payload)

def get_git_diff():
    try:
        return subprocess.check_output(['git', 'diff', 'HEAD~1', 'HEAD']).decode('utf-8')
    except:
        return None

def main():
    diff = get_git_diff()
    if not diff: return

    print("Analyzing and sending to Slack...")
    try:
        completion = client.chat.completions.create(
            model="llama-3.3-70b-versatile",
            messages=[
                {"role": "system", "content": "You are a Laravel Expert. Give a brief code review and suggest unit tests."},
                {"role": "user", "content": f"Review this diff:\n\n{diff}"}
            ]
        )
        
        result = completion.choices[0].message.content
        
        # إرسال لـ Slack
        send_to_slack(result)
        
        # حفظ في ملف للـ Artifacts (كما فعلنا سابقاً)
        with open("ai_review.md", "w", encoding="utf-8") as f:
            f.write(result)
            
    except Exception as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    main()
