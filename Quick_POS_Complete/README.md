# QuickPOS Landing Page

[![QuickPOS CI Pipeline](https://github.com/AbuzarSial/Quick_POS/actions/workflows/ci.yml/badge.svg)](https://github.com/AbuzarSial/Quick_POS/actions/workflows/ci.yml)

QuickPOS is a responsive PHP landing page for a modern Point of Sale system. The project demonstrates product quality and process rigor through Jira planning, GitHub pull requests, automated testing, and GitHub Actions CI/CD.

## Project Sections

- Header with logo, navigation links, and sign-up button
- Hero section with headline, sub-headline, CTA, and dashboard preview
- Features section with four POS benefits
- Pricing section with Basic, Pro, and Enterprise plans
- Contact form with PHP validation
- Thank-you page redirect after valid form submission
- Footer with links and copyright
- Automated tests and CI/CD pipeline

## Tools Used

- PHP
- HTML/CSS/JavaScript
- Jira
- GitHub
- GitHub Actions
- PHPUnit
- PHP CodeSniffer

## How to Run Locally

```bash
php -S localhost:8000
```

Open this URL in your browser:

```text
http://localhost:8000
```

## How to Install Test Dependencies

```bash
composer install
```

## How to Run Tests

```bash
composer test
```

Or run the custom PHP test runner:

```bash
php tests/run-custom-tests.php
```

## How to Run Code Quality Check

```bash
composer lint
```

## How to Run PHP Syntax Check

```bash
composer syntax
```

## Git Workflow

Use one branch per major Jira ticket or Epic section.

Example:

```bash
git checkout main
git pull origin main
git checkout -b feature/POS-90-complete-landing-page
```

Commit messages must include a Jira issue ID:

```bash
git commit -m "[POS-90] Complete QuickPOS landing page sections"
```

Push the branch and create a Pull Request:

```bash
git push -u origin feature/POS-90-complete-landing-page
```

## Suggested Pull Requests

- `[POS-11] Add QuickPOS logo to header`
- `[POS-20] Complete Header Section`
- `[POS-90] Complete QuickPOS Landing Page Sections`
- `[POS-60] Add Automated Testing and CI/CD Pipeline`

## CI/CD Pipeline

The GitHub Actions workflow runs on:

- Pull requests to `main`
- Pushes to `feature/**` branches
- Pushes to `bugfix/**` branches
- Manual workflow dispatch

Pipeline jobs:

- Jira ID validation in PR title and commit message
- PHP CodeSniffer code quality check
- PHPUnit automated tests
- Custom PHP test report
- PHP syntax check
- Page load smoke test using PHP built-in server
- Build artifact upload

## Manual Branch Protection Setup

In GitHub:

```text
Repository Settings -> Branches -> Add branch protection rule
```

Recommended settings for `main`:

- Require a pull request before merging
- Require approvals
- Require status checks to pass
- Block force pushes
- Do not allow direct commits to main

## Jira Proof Checklist

- Backlog screenshot
- Sprint 1 screenshot
- Sprint 2 screenshot
- Epics, stories, and tasks screenshot
- Bug tracking screenshot
- Burndown chart screenshot
- Jira ticket comments containing PR links

## GitHub Proof Checklist

- Repository files screenshot
- Feature branches screenshot
- Pull request history screenshot
- At least one approved PR screenshot
- Merged PR screenshot
- README badge screenshot

## CI/CD Proof Checklist

- `ci.yml` screenshot
- Failed pipeline screenshot
- Successful pipeline screenshot
- Artifact upload screenshot
- Branch protection screenshot

## Video Demo Flow

Show these steps in the final demonstration video:

1. Create a feature branch from a Jira ticket.
2. Push code and create a Pull Request.
3. GitHub Actions pipeline runs automatically.
4. A failed test blocks merge.
5. Fix the test and show successful pipeline.
6. Merge PR into `main`.
