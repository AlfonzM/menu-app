import React from "react";
import ReactDOM from "react-dom";
import { Router, Route, IndexRoute, browserHistory } from "react-router";

import Setup from "./pages/Setup";
import Products from "./pages/Products";
import ProductDetail from "./pages/ProductDetail";
import Layout from "./pages/Layout";
import Categories from "./pages/Categories";

const app = document.getElementById('app');

ReactDOM.render(
  <Router history={browserHistory}>
    <Route path="/" component={Layout}>
      <IndexRoute component={Setup}/>
      <Route path="/products">
        <IndexRoute component={Products}/>
        <Route path=":item" component={ProductDetail}/>
      </Route>
      <Route path="/categories" component={Categories}></Route>
    </Route>
  </Router>,
app);
