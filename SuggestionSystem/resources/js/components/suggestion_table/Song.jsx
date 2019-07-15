import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Users from './Users.jsx';

export default class Song extends Component {
    constructor(props) {
        super(props);

        this.state = {
        };
    }
    
    render() {
        const song = this.props.song;

        //Render table rows
        return (
            <tr key={song.id}>
                <td className="align-middle">{this.props.index}</td>
                <td className="align-middle">{song.artist}</td>
                <td className="align-middle">{song.title}</td>
                <td className="align-middle">{song.genre}</td>
                <td className="align-middle"><a href={song.link} target="_blank">Play</a></td>
                <td className="align-middle">
                    <Users key={song.id} song={song.id} initials={this.props.initials} names={this.props.names} levels={this.props.levels} />
                </td>
            </tr>)
    }
}

if (document.getElementById('song')) {
    ReactDOM.render(<Song />, document.getElementById('song'));
}
