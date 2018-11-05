import BaseRepository from "./BaseRepository";

class UserServiceAuthenticationRepository extends BaseRepository {
  constructor(){
    super();
    this.PATH = "/user_service_authentications";
  }
}

export default UserServiceAuthenticationRepository;
