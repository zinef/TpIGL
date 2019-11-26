import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Note extends Component {
    constructor(){
        super();
        this.state={
            data:[],
            group:"",
            niveau:""
        }
    }

    chargerliste(){ 
        console.log("chager liste etudiant + value of group");
       
        this.setState({
            data:[],
            group:document.getElementById("group").value,
            niveau :document.getElementById("niveau").value
        });

        console.log(this.state);


        const { data , group , niveau}=this.state;

       
        axios.post('/a',
        {
            data:this.state
        //   gn: {
        //     group: group,
        //     niveau: niveau,
        //   }
        })
        .then(response=>{
            //console.log(response);
            // this.setState({data:response.data});
        });
    }

    render() {
        return (
            
            <div className="container">
            <br/>
            <br/>
                      Choisi un group <span>  </span>
                      <select name="niveau" id='niveau' class="btn btn-secondary dropdown-toggle btn-sm">

                          <option>1cpi </option>
                          <option selected="yes">2cpi</option>
                          <option>1CS</option>
                                      
                      </select>
                      <select  id='group'  >--------------------------------
                          <option value='g1'>g1 </option>
                          <option selected="yes" value='g2'>g2</option>
                          <option value='g3'>g3</option>
                                          
                      </select>
                      <span> </span>
                      <button  className =" btn btn-outline-secondary"      
                      
                       onClick={()=>{this.chargerliste()}}

                        > charge la liste de groupe</button>
                      <br/><br/>

                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Matricule</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">
                            <select name="my_html_select_box" class="btn btn-secondary dropdown-toggle btn-sm">

                            <option>CC </option>
                            <option selected="yes">CI</option>
                            <option>CF</option>

                            </select>
                           
                    </th>
                   
                    </tr>
                </thead>
                <tbody>
                    {
                        this.state.data.map(data=>{
                            return(
                                <tr>
                                <th scope="row">{data.id}</th>
                                
                                <td>{data.nom}</td>
                                <td>{data.prenom}</td>
                                
                                <td><input type="text"  /> </td>
                                {/* <td><input type="text" name={dat.id} /> </td> */}
                            
                                
                                </tr>
                                
                            )
                        })
                    }

                   
                </tbody>
                </table>
                <button>Save</button>
               
            </div>
          
        );
    }
    
}

if (document.getElementById('note')) {
    ReactDOM.render(<Note/>, document.getElementById('note'));
}
