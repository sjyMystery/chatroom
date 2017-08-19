import f from './fetch'

const test=()=>
{
    f('/api/login','GET',{username:'348831271@qq.com',password:'sujiayi970804'}).then((data)=>console.log(data),(data)=>console.log(data))
}

export default test