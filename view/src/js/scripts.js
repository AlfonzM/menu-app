import React from "react";
import ReactDOM from "react-dom";
import { Router, Route, IndexRoute, hashHistory, useRouterHistory } from "react-router";

import Setup from "./pages/Setup";
import Products from "./pages/Products";
import ProductDetail from "./pages/ProductDetail";
import Layout from "./pages/Layout";
import Categories from "./pages/Categories";

const app = document.getElementById('app');

ReactDOM.render(
  <Router history={hashHistory}>
    <Route path="/" component={Layout}>
      <Route path="/setup" component={Setup}></Route>
      <Route path="/products" component={Products}>
        <Route path="/products/:item" component={ProductDetail}></Route>
      </Route>
      <Route path="/categories" component={Categories}></Route>
      <IndexRoute path="" component={Setup}></IndexRoute>
    </Route>
  </Router>,
app);
