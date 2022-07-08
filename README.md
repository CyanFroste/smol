# SMOL

A Very Minimalistic PHP Framework for prototyping with TailwindCSS and Typescript support

<br>

## Getting Started

### Prerequisites

- [Node](https://nodejs.org/en/)

- [PHP](https://www.apachefriends.org/)

- [Composer](https://getcomposer.org/)

<br>

### Installation

1. Clone the repo

```
git clone https://github.com/CyanFroste/smol.git
```

2. Install PHP dependencies

```
composer update
```

3. Install Javascript dependencies

```
npm i
```

4. Start dev server (This will start a PHP server on http://localhost:3000)

```
npm start
```

> Note: Hot reloading is absent

<br>

### Usage

- Register new routes in `public/index.php`

- Add controllers inside `./controllers`

- Add views inside `./views`

- Supports minor reusable components which can be added inside `./components`

- To compile Tailwind

```
npm run cssw  // watch mode
npm run css   // production build
```

- To compile Typescript

```
npm run tsw  // watch mode
npm run ts   // production build
```

<br>

## Make

A small utility to generate boilerplate code for controllers and components

Usage - From root directory, run

```
node make <name> -type

Eg.
node make -r HomeController // Controller
node make -c Button         // Component
```
