import React from "react";
import { Link } from "react-router";


import SearchBox from "./SearchBox";
import DropOption from "./DropOption";

export default class Header extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isActive: true,
      productCount: 0,
      categoryCount: 0,
      subcategoryCount: 0,
    };
  }
  componentDidMount() {
    this.setState({ isActive: false });
  }
  handleCollapse() {
    this.setState({ isActive: (this.state.isActive) ? false : true }, () => {
      if(this.state.isActive){
        // TODO
        console.log('ajax');
      }
    });
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
                <i id="menu-drop-down" class="mdi mdi-menu-down"></i>

                <div class="drop-down-list">
                  <DropOption name="Products"
                              count={this.state.productCount}
                              onClick={this.handleOptionClick.bind(this)}/>
                  <DropOption name="Categories"
                              count={this.state.categoryCount}
                              onClick={this.handleOptionClick.bind(this)}/>
                  <DropOption name="Sub Categories"
                              count={this.state.subcategoryCount}
                              onClick={this.handleOptionClick.bind(this)}/>
                  <div class="divider"></div>
                  <DropOption name="Create Sale"
                              onClick={this.handleOptionClick.bind(this)}/>
                  <DropOption name="Active Sales"
                              count="0"
                              onClick={this.handleOptionClick.bind(this)}/>
                  <div class="divider"></div>
                  <DropOption name="Log Out"
                              onClick={this.handleOptionClick.bind(this)}/>
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
