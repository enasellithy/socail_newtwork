import os
import subprocess
import google.generativeai as genai
import requests

# 1. إعداد الإعدادات
GENAI_KEY = os.getenv("GEMINI_API_KEY")
GITHUB_TOKEN = os.getenv("GITHUB_TOKEN")
REPO = os.getenv("REPO_NAME")
SHA = os.getenv("COMMIT_SHA")

genai.configure(api_key=GENAI_KEY)
model = genai.GenerativeModel('gemini-1.5-flash')

def get_git_diff():
    try:
        # بيجيب الفرق بين آخر تعديل واللي قبله
        diff = subprocess.check_output(['git', 'diff', 'HEAD~1', 'HEAD']).decode('utf-8')
        return diff
    except Exception as e:
        print(f"Error getting diff: {e}")
        return None

def post_comment(body):
    # بيبعت مراجعة الـ AI كـ Comment على الـ Commit في GitHub
    url = f"https://api.github.com/repos/{REPO}/commits/{SHA}/comments"
    headers = {
        "Authorization": f"token {GITHUB_TOKEN}",
        "Accept": "application/vnd.github.v3+json"
    }
    payload = {"body": body}
    response = requests.post(url, json=payload, headers=headers)
    return response.status_code

def main():
    diff = get_git_diff()
    if not diff or len(diff) < 10:
        print("No significant changes to analyze.")
        return

    # البرومبت مخصص لـ Laravel
    prompt = f"""
    You are a Senior Laravel & PHP Expert. Analyze the following code diff:
    
    {diff}

    Please provide:
    1. **Code Review**: Check for Laravel best practices, security (SQLi, XSS), and performance (N+1 queries).
    2. **Refactoring**: Suggest a cleaner way to write the code if possible.
    3. **Unit Test**: Generate a PHPUnit or Pest test for the new logic added.
    
    Format your response in Markdown. Keep it concise and professional.
    """

    print("Analyzing code with Gemini...")
    try:
        response = model.generate_content(prompt)
        ai_comment = "🤖 **AI Dev Agent Review:**\n\n" + response.text
        
        status = post_comment(ai_comment)
        if status == 201:
            print("Successfully posted AI review to GitHub!")
        else:
            print(f"Failed to post comment. Status: {status}")
            print(ai_comment) # اطبع المراجعة في اللوج لو الكومنت فشل
            
    except Exception as e:
        print(f"Error during AI generation: {e}")

if __name__ == "__main__":
    main()
