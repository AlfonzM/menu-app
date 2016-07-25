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
            <Link to="setup" class="nav-elem active">
              <i class="mdi mdi-tune nav-icon"></i>
              Setup
            </Link>
            <Link to="products" class="nav-elem">
              <i class="mdi mdi-shopping nav-icon"></i>
              Products
            </Link>
            <Link to="categories" class="nav-elem">
              <i class="mdi mdi-file-tree nav-icon"></i>
              Categories
            </Link>
          </nav>
        </div>
      </div>
    );
  }
}
