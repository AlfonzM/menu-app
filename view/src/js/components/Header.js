import React from "react";

import SearchBox from "./SearchBox";

export default class Header extends React.Component {
  changeHandler() {
    console.log("changing");
  }
  render() {
    return (
      <div class="header-bar">
        <div class="header-elem-wrapper">
          <i class="mdi mdi-cube"></i>
          <h1 class="title">Catalogue</h1>
        </div>
        <div class="header-elem-wrapper header-search-wrap">
          <SearchBox/>
        </div>
        <div class="header-elem-wrapper">1</div>
      </div>
    );
  }
}
