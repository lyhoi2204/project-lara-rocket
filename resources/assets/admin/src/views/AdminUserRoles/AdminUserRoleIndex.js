import React from "react";

import AdminUserRoleRepository from "../../repositories/AdminUserRoleRepository";
import columns from './_columns'
import info from './_info'
import {withRouter} from 'react-router-dom'
import Index from "../CRUDBase/Index";

class AdminUserRoleIndex extends Index {

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

export default withRouter(AdminUserRoleIndex);
