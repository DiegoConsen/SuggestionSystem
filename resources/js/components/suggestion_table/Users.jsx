import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import User from './User.jsx';

export default class Users extends Component {
    constructor(props) {
        super(props);

        this.state = {
        };
    }

    render() {
        const initials = this.props.initials;
        const names = this.props.names;
        const levels = this.props.levels;
        const song = this.props.song;

        //Render button group
        return (
            <div className="btn-group" role="group" aria-label="Basic example">
                {initials.map(function(initial, index){
                    return (
                        <User key={index} song={song} user={index + 1} initials={initial} name={names[index]} level={levels[index].level}/>
                    )}
                )}
            </div>
        )
    }
}

if (document.getElementById('users')) {
    ReactDOM.render(<Users />, document.getElementById('users'));
}
