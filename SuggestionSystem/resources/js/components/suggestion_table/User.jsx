import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class User extends Component {
    constructor(props) {
        super(props);

        this.state = {
            level: this.props.level
        };
    }

    //Change button colors
    handleSwitch() {
        var level = this.state.level;

        if (level === 2 || level === -1) {
            this.setState({ level: 0 });
            level = 0;
        } else {
            level = level + 1;
            this.setState({ level: level });
        }

        var url = "/songs/updateLevel/" + this.props.song + "&" + this.props.user + "&" + level;
        fetch(url);
    }

    //Set button color
    color() {
        let result;
        switch (this.state.level) {
            case 0:
                result = "btn btn-success";
                break;
            case 1:
                result = "btn btn-warning";
                break;
            case 2:
                result = "btn btn-danger";
                break;
            default:
                result = "btn btn-info";
                break;
        }
        return result;
    }

    render() {

        //Render buttons
        return (
            <button type="button" onClick={this.handleSwitch.bind(this)} className={this.color()} data-toggle="tooltip" data-placement="top" title={this.props.name}>{this.props.initials}</button>
        )
    }
}

if (document.getElementById('user')) {
    ReactDOM.render(<User />, document.getElementById('user'));
}
