import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import  './ens.css';

export default class Profile extends Component {
    render() {
        return (
<div className="container" style={{background : 'rgba(60,60,60,0.8)',
color:"white",width:'700px' }}>

  <div class="form-row">

        <div class="form-group col-md-12">
        <label >Email</label>
        <input type="email" class="form-control"   value="s_prof@esi.dz" readonly/>
        </div>

  </div>
  <div class="form-row">

        <div class="form-group col-md-6">
        <label >Nom</label>
        <input type="email" class="form-control"  value="Batata" readonly/>
        </div>
        <div class="form-group col-md-6">
        <label  >Prénom</label>
        <input type="text" class="form-control"   placeholder="sofiane" readonly/>
        </div>
  </div>
  <div className="form-row">
        <div class="form-group col-md-6">
        <label >Grade</label>
        <input type="text" class="form-control" id="inputAddress2" value="Professeur"readonly/>
        </div>

        <div class="form-group col-md-6">
        <label >Specialite</label>
        <input type="text" class="form-control"  value="Deep learning & Neural Network" readonly/>
        </div>

        </div>

  

  <div className="form-row">
        <div class="form-group col-md-6">
        <label >Date de Naissance</label>
        <input type="text" class="form-control" id="inputAddress2" value="20/02/1989" readonly/>
        </div>

        <div class="form-group col-md-6">
        <label >Telephone</label>
        <input type="text" class="form-control"  value="0793526458"readonly/>
        </div>

  </div>
  <div class="form-row">
        <div  class="form-group col-md-12">
        <label for="inputAddress2">Address </label>
        <input type="text" class="form-control" id="inputAddress2" value='151 Mechaher MED Alger' readonly/>
        </div>

  </div>    
</div>
        );
    }

}
if (document.getElementById('profile')) {
    ReactDOM.render(<Profile/>, document.getElementById('profile'));
}
