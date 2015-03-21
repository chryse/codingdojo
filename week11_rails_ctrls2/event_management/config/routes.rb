Rails.application.routes.draw do

  root "static_pages#home"

  get 'static_pages/home'

  resources :users

  resources :events

  resources :sessions, only: [:create, :destroy]

  resources :relationships, only: [:create, :destroy]

  resources :comments, only: [:create]

  get "/signout/" => "sessions#destroy"

  post "/signin/" => "sessions#create"

end