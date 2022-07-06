const path = require('path')

module.exports = {
  entry: './resources/ts/index.ts',
  output: {
    filename: 'script.js',
    path: path.resolve(__dirname, 'public'),
  },
  resolve: {
    extensions: ['.js', '.ts'],
  },
  module: {
    rules: [
      {
        test: /\.ts$/i,
        use: 'ts-loader',
        include: path.resolve(__dirname, 'resources', 'ts'),
      },
    ],
  },
}
