import os
import requests

def ask_cerebras(code_content):
    api_key = os.getenv('CEREBRAS_API_KEY')
    
    if not api_key:
        print("Error: CEREBRAS_API_KEY is not set.")
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
                "content": "You are a senior Laravel developer. Convert the provided PHP code into a functional tool definition (JSON format) or technical documentation. Return ONLY the content."
            },
            {"role": "user", "content": code_content}
        ]
    }
    
    try:
        response = requests.post(url, json=data, headers=headers)
        if response.status_code != 200:
            print(f"Failed with status {response.status_code}: {response.text}")
            return None
        return response.json()['choices'][0]['message']['content']
    except Exception as e:
        print(f"Error: {e}")
        return None

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
                input_path = os.path.join(root, filename)
                print(f"Processing: {input_path}")
                
                try:
                    with open(input_path, 'r', encoding='utf-8') as f:
                        content = f.read()
                    
                    generated_content = ask_cerebras(content)
                    
                    if generated_content:
                        output_filename = filename.replace(".php", ".md")
                        output_path = os.path.join(output_dir, output_filename)
                        
                        with open(output_path, 'w', encoding='utf-8') as f:
                            f.write(generated_content)
                        print(f"Saved: {output_path}")
                except Exception as e:
                    print(f"Could not process {input_path}: {e}")

print("Done!")
