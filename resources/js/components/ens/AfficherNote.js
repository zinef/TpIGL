import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class AfficherNote extends Component {
    constructor(){
        super();
        this.state={
            data:[],
        }
    }
    // componentDidMount(){
    //     axios.get('http://127.0.0.1:8000/Enseignant/Note')
    //     .then(response=>{
    //         this.setState({data:response.data});
    //     });
    // }

    render() {
        return (
            
            <div className="container">
            <br/>
            Choisi un group <span>  </span>
            <select name="niveau" class="btn btn-secondary dropdown-toggle btn-sm">

            <option>1cpi </option>
            <option selected="yes">2cpi</option>
            <option>1CS</option>
                            
            </select>
            <select name="group" class="btn btn-secondary dropdown-toggle btn-sm">

            <option>g1 </option>
            <option selected="yes">g2</option>
            <option>g3</option>
                            
            </select>
            <span> </span>
            <button  className =" btn btn-outline-secondary"> charge la liste de groupe</button>
            <br/><br/>
                
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">CC</th>
                    <th scope="col">CI</th>
                    <th scope="col">CF</th>
                    <th scope="col">Moyenne</th>

                   
                    </tr>
                </thead>
                <tbody>
  
                    <tr>
                        <th scope="row">1</th>
                        
                        <td>hamla </td>
                        <td>hichem</td>
            
                        <td> 15 </td>
                        <td> 15</td>
                        <td> 15</td>
                        <td> 15</td>
                                
                                
                                
                    </tr>
                    <tr>
                    <th scope="row">1</th>
                    
                    <td>hamla </td>
                    <td>hichem</td>
                    
                    
                    <td> 15 </td>
                    <td> 15 </td>
                    <td> 15 </td>
                    <td> 15 </td>
                    
                    
                    
                    </tr>
                    
                </tbody>
                </table>
              
            </div>
          
        );
    }
    
}

if (document.getElementById('afficherNote')) {
    ReactDOM.render(<AfficherNote/>, document.getElementById('afficherNote'));
}
