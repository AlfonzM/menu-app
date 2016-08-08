import React from "react";

const _defaultImage = "./styles/css/images/no-image.png"

export default class Image extends React.Component {
  constructor(props) {
    super(props);
    const imageFile = (!this.props.image) ? _defaultImage : this.props.image;
    this.state = {
      image: imageFile
    };
  }
  handleError() {
    this.setState({ image: _defaultImage });
  }
  render() {
    return (
      <img src={this.state.image}
           onError={() => this.handleError()}
           class="rslt-img"></img>
    );
  }
}
