import React from "react";

import AdminUserRoleRepository from "../../repositories/AdminUserRoleRepository";
import columns from './_columns'
import info from "./_info";
import {withRouter} from 'react-router-dom'
import Show from "../CRUDBase/Show";

class AdminUserRoleShow extends Show {

  setPageInfo() {
    this.title = info.title;
    this.path = info.path;
  }

  setRepository() {
    this.repository = new AdminUserRoleRepository();
  }

  setColumnInfo() {
    this.columns = columns;
  }

}

export default withRouter(AdminUserRoleShow);
