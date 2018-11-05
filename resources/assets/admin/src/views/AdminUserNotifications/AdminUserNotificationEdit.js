import React from "react";

import AdminUserNotificationRepository from "../../repositories/AdminUserNotificationRepository";
import columns from './_columns'
import info from "./_info";
import {withRouter} from 'react-router-dom'
import Edit from "../CRUDBase/Edit";
import AdminUserRepository from "../../repositories/AdminUserRepository";

class AdminUserNotificationEdit extends Edit {

  setPageInfo() {
    this.title = info.title;
    this.path = info.path;
  }

  setRepository() {
    this.repository = new AdminUserNotificationRepository();
  }

  setColumnInfo() {
    this.columns = columns;
  }

  setRelationRepository() {
    this.relationRepositories = {
      "adminUser": new AdminUserRepository(),
    };
  }
}

export default withRouter(AdminUserNotificationEdit);
