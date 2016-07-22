import React from "react";

export default class Header extends React.Component {
  render() {
    return (
      <div class="header-bar">
        <h1 class="title">Title</h1>
        <input placeholder="Search Product..." type="text"></input>
      </div>
    );
  }
}
