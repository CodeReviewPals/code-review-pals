<div align="center">
<picture>
  <source media="(prefers-color-scheme: dark)"  srcset="https://raw.githubusercontent.com/geeksesi/code-review-pals/master/resources/images/logo-white-350.png">
  <source media="(prefers-color-scheme: light)" srcset="https://raw.githubusercontent.com/geeksesi/code-review-pals/master/resources/images/logo-350.png">
  <img style="filter:invert(100%);" alt="Shows an illustrated sun in light mode and a moon with stars in dark mode." src="https://raw.githubusercontent.com/geeksesi/code-review-pals/master/resources/images/logo.svg">
</picture>
    <br/><br/>
  <a href="https://discord.gg/3G8cvWr7q4" ><img width="30%" src="https://user-images.githubusercontent.com/28778964/230801380-b8fb2ed3-fbcd-42ac-8e03-e45eb7c06e5e.png" /></a>
</div>

---
<div align="center">

![GitHub](https://img.shields.io/github/license/geeksesi/code-review-pals)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/geeksesi/code-review-pals/.github/workflows/deploy.yml)
![GitHub issues](https://img.shields.io/github/issues-raw/geeksesi/code-review-pals)
![GitHub pull requests](https://img.shields.io/github/issues-pr-raw/geeksesi/code-review-pals)

</div>

---

# Code Review Pals
Code Review Pals is a community-driven platform for code review, designed to help developers learn from each other and improve their skills by providing a place to share their code and get feedback from peers.

Our goal is to encourage developers of all levels to submit their code for review and to foster a supportive and collaborative environment where senior developers can help juniors learn and grow. We believe that code review is a vital part of the software development process, and that it helps improve code quality, catch bugs and security issues, and share knowledge.


```json
"license": "MIT",
  "stack": {
    "php": "^8.1",
    "laravel": "^10.0",
    "react": "^18.2",
    "npm": "^8.12"
    }
```

## Installation

### Database

```
php artisan migrate --force
```

> *TODO add dummies data ?*

### Local server 

```
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```
```
php artisan server
   INFO  Server running on [http://127.0.0.1:8000].
```

It is alive on your local. 

# Contribution
If you're interested in contributing to Code Review Pals, please check out the [Issues](https://github.com/geeksesi/code-review-pals/issues) and join our community. Together, we can make code review a more accessible and rewarding experience for everyone.

# License
Code Review Pals is Licensed under The MIT License (MIT). Please see [License File](https://github.com/geeksesi/code-review-pals/blob/master/LICENSE) for more information.
