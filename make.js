const path = require('path')
const { writeFile } = require('fs/promises')

const ROOT_PATH = __dirname

const TYPE_CONTROLLER = 'r'
const TYPE_COMPONENT = 'c'

main().catch(console.error)

async function main() {
  const {
    files: [name],
    flags: [type],
  } = parseArgs()

  if (!name) return console.error('Please enter a name for your file!')
  if (!type)
    return console.error(
      'Please specify the type of your file! Eg.\n\n' +
        `Controller  -> npm run make -${TYPE_CONTROLLER} Home    // HomeController.php\n` +
        `Component   -> npm run make -${TYPE_COMPONENT} Button  // Button.php`
    )

  switch (type) {
    case TYPE_COMPONENT: {
      const location = path.resolve(ROOT_PATH, 'components', `${name}.php`)
      return writeFile(location, makeComponent(name)).then(function () {
        console.log(`Component ${name}.php created @ ${location}`)
      })
    }

    case TYPE_CONTROLLER: {
      const location = path.resolve(ROOT_PATH, 'controllers', `${name}.php`)
      return writeFile(location, makeController(name)).then(function () {
        console.log(`Controller ${name}.php created @ ${location}`)
      })
    }
  }
}

// #region ---- UTILS

function parseArgs() {
  const VAR_PREFIX = '--'
  const FLAG_PREFIX = '-'
  const args = process.argv.slice(2)

  const files = args.filter(
    arg => !arg.startsWith(FLAG_PREFIX) && !arg.startsWith(VAR_PREFIX)
  )

  const flags = args
    .filter(arg => arg.startsWith(FLAG_PREFIX) && !arg.startsWith(VAR_PREFIX))
    .map(arg => arg.slice(FLAG_PREFIX.length))

  const vars = args
    .filter(arg => arg.startsWith(VAR_PREFIX))
    .reduce((acc, arg) => {
      const [key, value] = arg.slice(VAR_PREFIX.length).split('=')
      acc[key] = value
      return acc
    }, {})

  return { files, flags, vars }
}

// #endregion ---- UTILS

// #region ---- TEMPLATES

function makeComponent(name) {
  return `<?php

namespace app\\components;

use app\\lib\\Component;

class ${name} extends Component {
  public function render() {
    return '<div class="{class} border border-red-500 p-10">{children}</div>';
  }
}
`
}

function makeController(name) {
  return `<?php

namespace app\\controllers;

use app\\lib\\Request;
use app\\lib\\Response;

class ${name} {
  public static function index(Request $request, Response $response) {
    $response->render('pages/index_page', [
      'title' => 'Home',
    ]);
  }
} 
`
}

// #endregion ---- TEMPLATES
