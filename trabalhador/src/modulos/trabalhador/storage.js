import { setBearetoken } from "@/http";
export const setHeaderToken = token => setBearetoken(token)
export const getLocalToken = () => localStorage.getItem('token')
export const deleteLocalToken = () => localStorage.removeItem('token')
export const setLocalToken = token => localStorage.setItem('token',token)