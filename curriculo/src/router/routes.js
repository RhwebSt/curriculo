
import {route as auth} from '../modulos/auth'
import {route as index} from '../modulos/index'
import {route as curriculo} from '../modulos/curriculo'
import {route as admin} from '../modulos/admin'



export default [
    ...auth,
    ...index,
    ...curriculo,
    ...admin,

]