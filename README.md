# File Converter Web App

## About This Project
A web-based file conversion service built with CodeIgniter 4, integrating FreeConvert.com API v1.0.5 to handle multiple file format conversions. This project enables users to upload files and convert them into desired formats seamlessly, leveraging FreeConvert's robust API services.

## Tech Stack & Tools
| Category     | Stack                         |
|--------------|-------------------------------|
| Back-end     | PHP (CodeIgniter 4)            |
| Front-end    | Bootstrap, jQuery              |
| API Integration | FreeConvert.com API v1.0.5 |
| Others       | MySQL (Database)               |

## Key Features
- File upload with progress indicator.
- Format conversion using FreeConvert.com API.
- User-friendly dashboard to manage conversion tasks.
- Error handling and conversion status feedback.

## Live Demo (optional)
Access the live demo at: [https://file-converter.dodevca.com](https://file-converter.dodevca.com)

## Installation and Usage (Local Setup)
1. Clone this repository.
2. Install dependencies via Composer.
    ```bash
    composer install
    ```
3. Setup environment.
    - Copy `.env.example` to `.env` and configure your database & FreeConvert API Key.
4. Run database migrations (if any).
    ```bash
    php spark migrate
    ```
5. Start development server.
    ```bash
    php spark serve
    ```
6. Access the app at `http://localhost:8080`.

## Future Improvements
- [ ] Add file queue processing for large batch conversions.
- [ ] Enhance UI with conversion history and user preferences.
- [ ] Implement file conversion cost estimation using FreeConvert API pricing.
- [ ] Deploy public demo with usage restrictions.

## Contributors
This project is collaboratively developed by:
- [Dodevca](https://github.com/dodevca)
- [Gilangsejati](https://github.com/Gilangsejati)
- [lumilime](https://github.com/lumilime)
- [RolandSitompul](https://github.com/RolandSitompul750)
- [siwanyesarela](https://github.com/siwanyesarela)

## Contact & Collaboration
Interested in collaborating or enhancing this project?
Reach me at [LinkedIn](https://linkedin.com/in/dodevca) or visit [dodevca.com](https://dodevca.com).

## License
This project is licensed under GNU General Public License v3.0 (GPLv3).
Built using CodeIgniter 4 framework (MIT License).
See NOTICE.md for detailed attribution.

## Signature
Initiated by **Dodevca**, open for collaboration and continuous refinement.
