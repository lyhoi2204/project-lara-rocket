import React from "react";

import UserServiceAuthenticationRepository from "../../repositories/UserServiceAuthenticationRepository";
import columns from './_columns'
import info from "./_info";
import {withRouter} from 'react-router-dom'
import Show from "../CRUDBase/Show";

class UserServiceAuthenticationShow extends Show {

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

}

export default withRouter(UserServiceAuthenticationShow);
