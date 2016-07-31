import React from "react";
import { Link } from "react-router";

import SearchBox from "./SearchBox";

export default class Header extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isActive: false
    };
  }
  handleCollapse() {
    this.setState({ isActive: (this.state.isActive) ? false : true });
  }
  handleDeCollapse() {
    this.setState({ isActive: false });
  }
  handleOptionClick() {
    console.log("Option yo");
  }
  render() {
    const collapse = (this.state.isActive) ? 'active' : '';
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
            <div class="tool-wrapper">
              <button className={"icon-button drop-down-button "+collapse}
                      onClick={() => this.handleCollapse()}
                      onBlur={() => this.handleDeCollapse()}
                      tabIndex="0">
                <i class="mdi mdi-menu-down"></i>

                <div class="drop-down-list">
                  <div class="option"
                       onClick={() => this.handleOptionClick()}>
                    <span>Products</span>
                    <span class="count">0</span>
                  </div>
                  <div class="option"
                       onClick={() => this.handleOptionClick()}>
                    <span>Categories</span>
                    <span class="count">0</span>
                  </div>
                  <div class="option"
                       onClick={() => this.handleOptionClick()}>
                    <span>Sub Categories</span>
                    <span class="count">0</span>
                  </div>
                  <div class="divider"></div>
                  <div class="option"
                       onClick={() => this.handleOptionClick()}>
                    <span>Create Sale</span>
                    <span class="count"></span>
                  </div>
                  <div class="option"
                       onClick={() => this.handleOptionClick()}>
                    <span>Active Sales</span>
                    <span class="count">0</span>
                  </div>
                  <div class="divider"></div>
                  <div class="option"
                       onClick={() => this.handleOptionClick()}>
                    <span>Log Out</span>
                  </div>
                </div>
              </button>
            </div>
          </div>
        </header>
        <div class="nav-wrapper">
          <nav>
            <Link to="/setup"
                  class="nav-elem"
                  activeClassName="active">
              <i class="mdi mdi-tune nav-icon"></i>
              Setup
            </Link>
            <Link to="/products"
                  class="nav-elem"
                  activeClassName="active">
              <i class="mdi mdi-shopping nav-icon"></i>
              Products
            </Link>
            <Link to="/categories"
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
