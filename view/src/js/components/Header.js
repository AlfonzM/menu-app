import React from "react";
import { Link } from "react-router";

import SearchBox from "./SearchBox";

export default class Header extends React.Component {
  render() {
    return (
      <div class="header-bar">
        <header class="header-container">
          <div class="header-elem-wrapper">
            <i class="mdi mdi-cube"></i>
            <h1 class="title">商品紹介</h1>
          </div>
          <div class="header-elem-wrapper header-search-wrap">
            <SearchBox />
          </div>
          <div class="header-elem-wrapper">
            <button>商品を追加する</button>
            <button class="icon-button">
              <i class="mdi mdi-menu-down"></i>
            </button>
          </div>
        </header>
        <div class="nav-wrapper">
          <nav>
            <Link to="setup"
                  class="nav-elem"
                  activeClassName="active">
              <i class="mdi mdi-tune nav-icon"></i>
              Setup
            </Link>
            <Link to="products"
                  class="nav-elem"
                  activeClassName="active">
              <i class="mdi mdi-shopping nav-icon"></i>
              Products
            </Link>
            <Link to="categories"
                  class="nav-elem"
                  activeClassName="active">
              <i class="mdi mdi-file-tree nav-icon"></i>
              Categories
            </Link>
          </nav>
        </div>
      </div>
    );
  }
}
