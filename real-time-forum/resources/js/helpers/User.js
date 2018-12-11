import Token from './Token'
import AppStorage from './AppStorage'

class User{
	login(data){
		axios.post('/api/auth/login', data)
  		.then((response) => {
  			this.responseAfterLogin(response);
  		})
  		.catch((error) => {
  			console.log(error.response.data);
  		});
	}

	responseAfterLogin(response){
		const access_token = response.data.access_token;
		const user = response.data.user;
		if(Token.isValid(access_token)){
			AppStorage.store(access_token, user);
		}
	}
}

export default User = new User();