class CreatePosts < ActiveRecord::Migration
  def change
    create_table :posts do |t|
      t.text :content
      t.references :user, index: true

      t.timestamps null: false
    end
    add_foreign_key :posts, :users
    # Because we expect to retrieve all the microposts associated with a given user id 
    # in reverse order of creation, adds an index on the user_id and created_at columns
    add_index :posts, [:user_id, :created_at]
  end
end
