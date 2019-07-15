import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Song from './Song.jsx';

export default class SongTable extends Component {
    constructor(props) {
        super(props);

        this.state = {
            songs: [],
            initials: [],
            names: [],
            levels: [],
            isLoading: true,
        };
    }

    //Retrieve table data
    componentDidMount() {
        //Fetch song data
        fetch('/songs/all')
        .then(response => response.json())
        .then(data => this.setState({ songs: data }));

        //Fetch initials
        fetch('/users/showInitials')
        .then(response => response.json())
        .then(data => this.setState({ initials: data}));

        //Fetch names
        fetch('/users/showNames')
        .then(response => response.json())
        .then(data => this.setState({ names: data }));

        //Fetch names
        fetch('/songs/levels')
        .then(response => response.json())
        .then(data => this.setState({ levels: data, isLoading: false }));
    }

    //Render table
    render() {
        const { songs, initials, names, levels, isLoading } = this.state;

        if (isLoading) 
            return <p>Loading...</p>        
        else
            return (
                <table className="table text-left table-striped">
                    <thead className="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Artist</th>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Play</th>
                            <th scope="col">Vocalists</th>
                        </tr>
                    </thead>
                    <tbody>
                        {songs.map(function(song, index){
                            var songLevels = [];

                            for (var i = 0; i < initials.length; i++) {
                                songLevels.push(levels[index * initials.length + i]);
                            }

                            return (
                                <Song key={song.id} index={index + 1} song={song} initials={initials} names={names} levels={songLevels} />
                            )}
                        )}
                    </tbody>
                </table>
            );
    }
}

if (document.getElementById('songTable')) {
    ReactDOM.render(<SongTable />, document.getElementById('songTable'));
}
