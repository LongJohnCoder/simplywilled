import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NonuniformPoaComponent } from './nonuniform-poa.component';

describe('NonuniformPoaComponent', () => {
  let component: NonuniformPoaComponent;
  let fixture: ComponentFixture<NonuniformPoaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NonuniformPoaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NonuniformPoaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
