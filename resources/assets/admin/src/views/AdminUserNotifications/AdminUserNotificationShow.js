import React from "react";

import AdminUserNotificationRepository from "../../repositories/AdminUserNotificationRepository";
import columns from './_columns'
import info from "./_info";
import {withRouter} from 'react-router-dom'
import Show from "../CRUDBase/Show";

class AdminUserNotificationShow extends Show {

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

}

export default withRouter(AdminUserNotificationShow);
