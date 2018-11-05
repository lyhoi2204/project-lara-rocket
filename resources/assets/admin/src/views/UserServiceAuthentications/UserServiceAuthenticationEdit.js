import React from "react";

import UserServiceAuthenticationRepository from "../../repositories/UserServiceAuthenticationRepository";
import columns from './_columns'
import info from "./_info";
import {withRouter} from 'react-router-dom'
import Edit from "../CRUDBase/Edit";

class UserServiceAuthenticationEdit extends Edit {

  setPageInfo() {
    this.title = info.title;
    this.path = info.path;
  }

  setRepository() {
    this.repository = new UserServiceAuthenticationRepository();
  }

  setColumnInfo() {
    this.columns = columns;
  }

  setRelationRepository() {
    this.relationRepositories = {
    };
  }
}

export default withRouter(UserServiceAuthenticationEdit);
