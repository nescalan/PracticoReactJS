const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  entry: "./src/index.js",
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "bundle.js",
  },
  resolve: {
    extensions: [".js", ".jsx"],
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
        },
      },
      {
        test: /\.html$/,
        use: [
          {
            loader: "html-loader",
          },
        ],
      },
      {
        test: /\.(s*)css$/,
        use: [
<<<<<<< HEAD
          {
            loader: MiniCssExtractPlugin.loader,
          },
=======
          { loader: MiniCssExtractPlugin.loader },
>>>>>>> 6372f28016c91a98920db6262cdd209b60587707
          "css-loader",
          "sass-loader",
        ],
      },
    ],
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: "./public/index.html",
      filename: "./index.html",
    }),
    new MiniCssExtractPlugin({
<<<<<<< HEAD
      filename: "assets/[name]",
=======
      filename: "assets/[name].css",
>>>>>>> 6372f28016c91a98920db6262cdd209b60587707
    }),
  ],
};
