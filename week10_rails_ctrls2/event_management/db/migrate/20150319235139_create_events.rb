class CreateEvents < ActiveRecord::Migration
  def change
    create_table :events do |t|
      t.string :name
      t.date :date
      t.string :location
      t.string :state
      t.references :user, index: true

      t.timestamps null: false
    end
    add_foreign_key :events, :users
    add_index :events, [:user_id, :created_at]
  end
end
