import React from "react";
import { Link } from "react-router";

export default class Header extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isActive: 'input-wrap search-wrap'
    };
  }
  handleFocus() {
    if(this.state.isActive != 'collapse input-wrap search-wrap') {
      this.setState({ isActive: 'collapse input-wrap search-wrap' });
    }
  }
  handleFocusOut() {
    this.setState({ isActive: 'input-wrap search-wrap' });
  }
  handleChange() {

  }
  render() {
    var collapse = this.state.isActive;

    return (
      <div className={this.state.isActive} onBlur={() => this.handleFocusOut()} onFocus={() => this.handleFocus()} tabIndex="0">
          <input type="search" id="search" class="search-field" placeholder="Search Product..." onChange={() => this.handleChange()}></input>
          <label for="search" class="btn-icn mdi mdi-magnify"></label>
        <div class="rslt-view">
          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">ソファー</span>
              <span class="item-info">家具 / 家の装飾 &nbsp;<span class="sale-tag">-70%</span></span>
            </div>
          </div>

          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">Round Table &nbsp;<i class="mdi mdi-bookmark feat-icon"></i></span>
              <span class="item-info">Furniture / Table &nbsp;<span class="sale-tag"></span></span>
            </div>
          </div>

          <div class="rslt-elem">
            <img class="rslt-img"></img>
            <div class="info-container">
              <span class="item-name">中国テーブル</span>
              <span class="item-info">家具 / 家の装飾 &nbsp;<span class="sale-tag">-70%</span></span>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
