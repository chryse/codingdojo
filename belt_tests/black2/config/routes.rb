Rails.application.routes.draw do
  root "static_pages#home"

  get 'static_pages/home'

  resources :users

  resources :posts

  resources :sessions, only: [:create, :destroy]

  resources :relationships, only: [:create, :destroy]

  get "/signout/" => "sessions#destroy"

  post "/signin/" => "sessions#create"

  get "/bright_ideas/" => "posts#index"

end
