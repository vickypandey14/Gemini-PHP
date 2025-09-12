<img src="https://raw.githubusercontent.com/vickypandey14/Gemini-PHP/main/public/images/final_keyword_header.width-1200.png">

# Gemini API Integration in PHP

### This repository contains a PHP application that integrates with the Gemini API for generating content based on user prompts.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/vickypandey14/Gemini-PHP.git
   ```
   
3. Navigate to the project directory:
   ```bash
   cd Gemini-PHP
   ```
4. Install dependencies using Composer:
   ```bash
   composer install
   ```

## Usage
1. Configure your Gemini API key in `response.php`.
2. Open `index.php` in a web browser.
3. Enter a prompt in the input field.
4. Click on the "Generate Response" button.
5. View the generated response.

## API
A new folder named `api` has been added, containing the `get-response.php` file. This file is responsible for handling requests to the Gemini API, generating responses based on user input. To use this API:

1. Ensure the Gemini API key is set in `get-response.php`.
2. Send a POST request with a JSON body containing the `text` field to receive a generated response.

## Contributing
Contributions are welcome! Feel free to fork the repository and submit pull requests with improvements, bug fixes, or new features.

## License
This project is licensed under the Apache License 2.0. See the [LICENSE](LICENSE) file for details.

## Author
[Vivek Chandra Pandey](https://github.com/vickypandey14)

For any questions or support, please open an issue on GitHub: [Gemini-PHP Issues](https://github.com/vickypandey14/Gemini-PHP/issues)

