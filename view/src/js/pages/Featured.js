import React from "react";
import { Link } from "react-router";

export default class Featured extends React.Component {
  render() {
    return (
      <div>
        <h1>Featured</h1>
        <Link to="settings">Page 1</Link>
      </div>
    );
  }
}
