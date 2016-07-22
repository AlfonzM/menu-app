import React from "react";
import { Link } from "react-router";

export default class Archive extends React.Component {
  render() {
    return (
      <div>
        <h1>Archive</h1>
        <Link to="featured">Page 3</Link>
      </div>
    );
  }
}
