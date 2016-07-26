import React from "react";
import ReactDOM from "react-dom";
import { Router, Route, IndexRoute, hashHistory } from "react-router";

import Setup from "./pages/Setup";
import Products from "./pages/Products";
import ProductDetail from "./pages/ProductDetail";
import Layout from "./pages/Layout";
import Categories from "./pages/Categories";

const app = document.getElementById('app');

ReactDOM.render(
  <Router history={hashHistory}>
    <Route path="/" component={Layout}>
      <IndexRoute component={Setup}></IndexRoute>
      <Route path="setup" component={Setup}></Route>
      <Route path="products" component={Products}></Route>
      <Route path="products/:item" component={ProductDetail}></Route>
      <Route path="categories" component={Categories}></Route>
    </Route>
  </Router>,
app);
