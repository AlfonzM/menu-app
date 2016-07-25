import React from "react";
import { Link } from "react-router";

import SearchBox from "./SearchBox";

export default class Header extends React.Component {
  changeHandler() {
    console.log("changing");
  }
  render() {
    return (
      <div class="header-bar">
        <div class="header-container">
          <div class="header-elem-wrapper">
            <i class="mdi mdi-cube"></i>
            <h1 class="title">catalogue</h1>
          </div>
          <div class="header-elem-wrapper header-search-wrap">
            <SearchBox/>
          </div>
          <div class="header-elem-wrapper">1</div>
        </div>
        <div class="nav-wrapper">
          <nav>
            <Link to="home" class="nav-elem active">Home</Link>
            <Link to="products" class="nav-elem">Products</Link>
            <Link to="categories" class="nav-elem">Categories</Link>
          </nav>
        </div>
      </div>
    );
  }
}
