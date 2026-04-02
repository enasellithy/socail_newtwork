import os
import requests

def ask_cerebras(code_content):
    api_key = os.getenv('CEREBRAS_API_KEY')
    if not api_key:
        return None

    url = "https://api.cerebras.ai/v1/chat/completions"
    headers = {
        "Authorization": f"Bearer {api_key}",
        "Content-Type": "application/json"
    }
    
    data = {
        "model": "llama3.1-8b",
        "messages": [
            {
                "role": "system", 
                "content": "You are a senior Laravel developer. Convert the PHP code into a functional tool JSON or technical documentation. Return ONLY the content."
            },
            {"role": "user", "content": code_content}
        ]
    }
    
    try:
        response = requests.post(url, json=data, headers=headers)
        if response.status_code == 200:
            return response.json()['choices'][0]['message']['content']
        return None
    except:
        return None

def should_skip(filename, root):
    base_name = filename.replace(".php", "")
    
    doc_exists = os.path.exists(os.path.join('docs', f"{base_name}.md"))
    unit_test_exists = os.path.exists(os.path.join('tests/Unit', f"{base_name}Test.php"))
    selenium_exists = os.path.exists(os.path.join('tests/Selenium', f"{base_name}Test.php")) or \
                      os.path.exists(os.path.join('tests/Browser', f"{base_name}Test.php"))

    return doc_exists and unit_test_exists and selenium_exists

source_dirs = ['app/Http', 'app/SOLID']
output_dir = 'docs'

if not os.path.exists(output_dir):
    os.makedirs(output_dir)

for s_dir in source_dirs:
    if not os.path.exists(s_dir):
        continue

    for root, _, files in os.walk(s_dir):
        for filename in files:
            if filename.endswith(".php"):
                if should_skip(filename, root):
                    print(f"Skipping (Tests & Docs exist): {filename}")
                    continue
                
                input_path = os.path.join(root, filename)
                print(f"Processing: {input_path}")
                
                try:
                    with open(input_path, 'r', encoding='utf-8') as f:
                        content = f.read()
                    
                    res = ask_cerebras(content)
                    if res:
                        out_path = os.path.join(output_dir, filename.replace(".php", ".md"))
                        with open(out_path, 'w', encoding='utf-8') as f:
                            f.write(res)
                except:
                    pass

print("Done!")
