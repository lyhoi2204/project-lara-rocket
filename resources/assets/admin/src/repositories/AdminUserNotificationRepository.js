import BaseRepository from "./BaseRepository";

class AdminUserNotificationRepository extends BaseRepository {
  constructor(){
    super();
    this.PATH = "/admin_user_notifications";
  }
}

export default AdminUserNotificationRepository;
