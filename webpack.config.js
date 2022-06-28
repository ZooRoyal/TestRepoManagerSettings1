/*
*	REWE Digital GmbH
*	IT-Verticals
*/

/* RdssExample- webpack config
========================================================================== */
// init
const path = require('path');
const moduleName = 'rdss-example';

// webpack
module.exports = {
    mode: 'production',
    entry: './Resources/frontend/index.js',
    output: {
        filename: moduleName + '.min.js',
        path: path.resolve(__dirname, './Resources/views/frontend/_public/src/js'),
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            outputPath: '../css',
                            name: moduleName + '.min.css',
                        },
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sassOptions: {
                                outputStyle: 'compressed',
                            },
                        },
                    },
                ],
            },
            {
                test: /\.css$/,
                use: [
                    'style-loader',
                    'css-loader',
                ],
            },
        ],
    },
};
