const path = require('path');
const {VueLoaderPlugin} = require("vue-loader");

module.exports = {
    entry: path.resolve(__dirname, './assets/js/app.js'),
    mode: "development",
    devtool: 'source-map',
    module: {
        rules: [
            {test: /\.js$/, use: 'babel-loader'},
            {test: /\.vue$/, loader: 'vue-loader'},
            {test: /\.scss$/, use: ['vue-style-loader', 'css-loader', 'sass-loader']},
            {test: /\.css$/i, use: ["style-loader", "css-loader", "postcss-loader"]},
        ]
    },
    plugins: [
        new VueLoaderPlugin()
    ],
    output: {
        path: path.resolve(__dirname, './public/js'),
        filename: 'bundle.js',
    },
    resolve: {
        extensions: [".vue", ".js", ".scss"]
    }
}