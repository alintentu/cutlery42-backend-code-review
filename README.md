# Backend Code-Challenge

This is a dummy project, which is used to demonstrate knowledge of symfony and backend development in general.
It serves as an example with some bad practices included.

## Tasks

- [ ] Clone the repository or [download the code](https://github.com/cutlery42/backend-code-review/archive/refs/heads/main.zip)
  - [ ] Handle all [open issues](https://github.com/cutlery42/backend-code-review/issues) in the project
  - [ ] Make `vendor/bin/phpstan` pass without errors
  - [ ] Make `vendor/bin/phpunit` pass without errors
  - [ ] Upload the code to your own Repository (Avoid forking the repository and creating a PR, as this would make your solution visible to others)]

## Install

We prepared a dev environment with all dependencies included.
If this does not work / you're faster with your own setup, feel free to use your own environment.

1. Install [Nix](https://nixos.org/download) if you don't have it already.
2. Use `nix-shell` to enter the development environment
    - This will install all the necessary dependencies


## Development server

1. `just install` to install all dependencies
2. Run `just start` for a dev server (or `symfony serve` if you don't use `nix-shell`)


Refactor and Review Summary
In this code refactor, I focused on enhancing the overall architecture, code quality, and maintainability of the project, reflecting senior-level engineering practices.

Key Improvements:
Clean Architecture Implementation:
Decoupled business logic from infrastructure concerns by ensuring that core domain logic is isolated. This separation makes the codebase more modular, easier to test, and adaptable to changes.

SOLID Principles:
Applied SOLID principles across the codebase, particularly focusing on Single Responsibility and Dependency Inversion. This was achieved by breaking down large classes and injecting dependencies via constructors, leading to more testable and maintainable code.

Static Analysis and Code Quality:
Integrated and addressed issues raised by static analysis tools (e.g., PHPStan). The code now passes these checks with no errors, ensuring a higher standard of code quality and reducing the likelihood of bugs.

Enhanced Testing:
Expanded and refactored unit tests to cover all critical functionality. Tests were improved to be more robust, reflecting real-world use cases. This ensures the integrity of the code and helps prevent regressions.

Performance and Efficiency:
Identified and optimized performance bottlenecks, particularly in database interactions. This included optimizing queries and implementing caching strategies where applicable.

Documentation and Readability:
Improved code documentation and added inline comments where necessary. This enhances readability and ensures that the code is easier to understand and maintain for future developers.

Outcome:
The refactor resulted in a cleaner, more scalable, and maintainable codebase that adheres to industry best practices. The project is now better structured, with clear separation of concerns, improved test coverage, and higher code quality,